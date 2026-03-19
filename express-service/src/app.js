require("dotenv").config();
const express = require("express");
const db = require("./db.js");

const app = express();
app.use(express.json());


db.query(`
    CREATE TABLE IF NOT EXISTS tasks (
        id_task INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100),
        description VARCHAR(100),
        status VARCHAR(100),
        FOREIGN KEY (id) REFERENCES users(id),
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
`);

function requireToken(req, res, next) {
    const token = req.headers["authorization"];
    if (!token) {
        return res.status(401).json({ error: "Token requerido" });
    }
    if (token !== `Token ${process.env.TOKEN_SECRETO}`) {
        return res.status(403).json({ error: "No autorizado" });
    }
    next();
}

app.post("/tasks",requireToken, function(req, res) {
    db.query(
        "INSERT INTO tasks (title, description, status) VALUES (?, ?, ? )",
        [req.body.title, req.body.description, req.body.status] 
    ).then(function() {
        res.json("Create");
    });
});

app.get("/tasks",requireToken, function(req, res) {
    db.query("SELECT * FROM tasks")
    .then(function([rows]) {
        res.json(rows);
    });
});

app.get("/tasks/:id", requireToken, function(req, res) {
    db.query(
        "SELECT FROM tasks WHERE id = ?",
        [req.params.id]
    ).then(function() {
        res.json(rows);
    });
});


app.put("/tasks/:id", requireToken, function(req, res) {
    db.query(
        "UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?",
        [req.body.title, req.body.description, req.body.status , req.params.id]
    ).then(function() {
        res.json({ msg: "Update" });
    });
});

app.delete("/tasks/:id", requireToken, function(req, res) {
    db.query(
        "DELETE FROM tasks WHERE id = ?",
        [req.params.id]
    ).then(function() {
        res.json({ msg: "Delete" });
    });
});

app.delete("/tasks", requireToken, function(req, res) {
    db.query(
        "DELETE FROM * tasks",
        [req.params.id]
    ).then(function() {
        res.json({ msg: "Borradas" });
    });
});



app.listen(3000, function() {
    console.log("Servidor en puerto 3000");
});