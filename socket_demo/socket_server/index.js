const express = require("express");
const http = require("http");
const socketIo = require("socket.io");

const port = process.env.PORT || 4000;
const index = require("./routes/index");

const app = express();
app.use(index);

const server = http.createServer(app);

const io = socketIo(server, {
    cors: {
      origin: ["http://localhost:4000", "http://localhost:3000"],
      methods: ["GET", "POST"]
    }
});

let interval;
let count_time = 0;

io.on("connection", (socket) => {
  console.log("New client connected");

  if (interval) {
    clearInterval(interval);
  }

  // interval = setInterval(() => {
  //   response = `update status user ${count_time}`
  //   console.log(response);
  //   socket.emit("FromAPI", response);
  //   count_time++;
  // },1000)

  socket.on('message', message => {
    //console.log(message);
    socket.broadcast.emit("resceivemessage", message);
    socket.emit("resceivemessage", message);
  });

  socket.on("disconnect", () => {
    console.log("Client disconnected");
    clearInterval(interval);
  });
});

server.listen(port, () => console.log(`Listening on port ${port}`));