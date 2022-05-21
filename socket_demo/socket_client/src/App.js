import React, { useState, useEffect } from "react";
import socketIOClient from "socket.io-client";
const ENDPOINT = "http://127.0.0.1:4000";

const socket = socketIOClient(ENDPOINT);

function App() {
  const [response, setResponse] = useState("");
  const [username, setUsername] = useState("");
  const [ds_chat, setDSchat] = useState([]);
  const [socketstate, setSocket] = useState({});

  useEffect(() => {
    setSocket(socket);
    socket.on("FromAPI", data => {
      setResponse(data);
    });
    socket.on('resceivemessage', message => {
      console.log(message);
      var ds_chat_temp = [...ds_chat];
      ds_chat_temp.push(message);
      //console.log(ds_chat_temp);
      setDSchat(ds_chat_temp);
    })
  }, [ds_chat]);

  const handleChangeInput = (e) => {
    //console.log(123);
    
  }

  const handleSaveUsername = () => {
    setUsername(document.getElementById('username').value);
  }

  const handleSendMessage = () => {
    if(username) {
      //console.log(document.getElementById('content_chat').value);
      var message = document.getElementById('content_chat').value;
      socketstate.emit("message", message);
    }
    else {
      alert('Vui lòng nhập username');
    }
    
  }

  return (
    <div>
      <p>
        {response}
      </p>
      <div>
        {(username)?<div className="showuser">
          hello {username}
        </div>:<div className="putuser">
          <input type="text" id="username" name="username" onChange={handleChangeInput} />
          <button onClick={handleSaveUsername}>Use this Username</button>
        </div>}
      </div>
      <div className="container_chat">
        <div className="ds_chat">
          {ds_chat.map((itemchat, index) => <div key={index} className="message">{itemchat}</div>)}
        </div>
        <div className="form_chat">
          <textarea id="content_chat"></textarea>
          <button onClick={handleSendMessage}>Send</button>
        </div>
      </div>
    </div>
  );
}

export default App;