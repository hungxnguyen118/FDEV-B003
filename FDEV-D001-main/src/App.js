import logo from './logo.svg';
import './App.css';
import { useEffect, useState } from 'react';

import {
  BrowserRouter,
  Routes,
  Route,
} from "react-router-dom";

//import socketIOClient from 'socket.io-client';

import DragAndDrop from './Modules/DragAndDrop';
import TrangChu from './Pages/TrangChu';
//import Register from './Pages/Register';
//import Game from './Pages/Game';
import DetailProduct from './Pages/DetailProduct';

import Header from "./Widgets/Header";
import Footer from './Widgets/Footer';

const ENDPOINT = 'http://localhost:4000'

function Test() {

  // const [response, setResponse] = useState("");
  const [itemactive, setItemActive] = useState(0);
  const [classactive, setClassActive] = useState(0);
  const number_item = 6

  // useEffect(() => {
  //   const socket = socketIOClient(ENDPOINT);
  //   socket.on("hello", data => {
  //     setResponse(data);
  //   });
  // }, []);

  useEffect(() => {
    setInterval(() => {
      setClassActive('slideInRight');
      setTimeout(() => {
        setClassActive('slideInLeft');
      }, 2000);
    }, 4000)
  })

  return (
    // <p>
    //   It's <time dateTime={response}>{response}</time>
    // </p>
    <>
      {itemactive}
      <div className="ds_slide">
        <div className="show_slide">
          <div className={'group_item group_item_1 active ' + classactive}>
            <div className="item"></div>
            <div className="item"></div>
            <div className="item"></div>
          </div>
        </div>
      </div>
    </>
  );

  // return (
  //   <div className="App">
  //     <BrowserRouter>
  //       <Header />
  //       <Routes>
  //         <Route path="/" element={<TrangChu/>}></Route>
  //         <Route path="/register" element={<Register />}></Route>
  //         <Route path="/game" element={<Game />}></Route>
  //         <Route path="/draganddrop" element={<DragAndDrop />}></Route>
  //         <Route path="/product">
  //           <Route path=":productId" element={<DetailProduct />} />
  //         </Route>
  //       </Routes>
  //       <Footer />
  //     </BrowserRouter>
  //   </div>
  // );
}

export default Test;
