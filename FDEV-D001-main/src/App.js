import logo from './logo.svg';
import './App.css';
import Header from './Widgets/Header';
import Content from './Widgets/Content';
import Footer from './Widgets/Footer';
import DragAndDrop from './Modules/DragAndDrop';
import GameEvent from './Modules/GameEvent';
import RegisterForm from './Modules/RegisterForm';

import { BrowserRouter as Router } from 'react-router-dom'


function App() {
  return (
    <div>
      <Router>
        <Header></Header>
        <Content></Content>
        {/* <RegisterForm /> */}
        <Footer></Footer>
        {/* <DragAndDrop /> */}
        {/* <GameEvent /> */}
      </Router>
    </div>
  );
}

export default App;
