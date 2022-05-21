import React, { Component } from 'react';
import './Game.css';

class GameEvent extends Component {

    constructor (props){
        super(props);
        this.state = {
            speed: 1,
            position_road: 0,
            time_run: 0,
            score: 0,
            player_position_x: 0,
            player_position_y: 0,
            player_position_deg: 0
        }

        this.handleController = this.handleController.bind(this);
    }

    componentDidMount(){
        this.intervalId = setInterval(this.run_game.bind(this), 40);

        let input = document.getElementById('dieu_khien');
        input.focus();
    }

    run_game = () => {
        //console.log(this.state.speed);
        this.setState({
            speed: 1 + Math.ceil(this.state.time_run / 5000),
            position_road: this.state.position_road + this.state.speed,
            time_run: this.state.time_run + 40,
            score: this.state.score + this.state.speed,
            player_position_x: this.state.player_position_x,
            player_position_y: this.state.player_position_y
        });
    }

    handleController = (e) => {
        console.log(e.keyCode);

        if(e.keyCode == 37) //trai
        {
            if(this.state.player_position_x <= 0){
                //do nothing
            }
            else{
                this.setState(prevState => {
                    prevState.player_position_x -= 1;
                    prevState.player_position_deg = -5;
                    return prevState;
                });
            }
            
        }
        else if(e.keyCode == 38) // tren
        {
            if(this.state.player_position_y >= 403){
                // do nothing
            }
            else{
                this.setState(prevState => {
                    prevState.player_position_y += 1;
                    return prevState;
                });
            }
        }
        else if(e.keyCode == 39) //phai
        {
            if(this.state.player_position_x >= 211){
                //do nothing
            }
            else{
                this.setState(prevState => {
                    prevState.player_position_x += 1;
                    prevState.player_position_deg = 5;
                    return prevState;
                });
            }
        }
        else if(e.keyCode == 40) // duoi
        {
            if(this.state.player_position_y <= 0){
                //do nothing
            }
            else{
                this.setState(prevState => {
                    prevState.player_position_y -= 1;
                    return prevState;
                });
            }
            
        }
    }

    handleControllerOut = () => {
        this.setState(prevState => {
            prevState.player_position_deg = 0;
            return prevState;
        });
    }

    handleClickOutGame = () => {
        let input = document.getElementById('dieu_khien');
        input.focus();
    }

    render() {
        return (
            <div onClick={this.handleClickOutGame}>
                <div className="game_container" style={{
                    backgroundPosition: '0 ' + this.state.position_road + 'px'
                }}>
                    <div className="score">{this.state.score}</div>
                    <div className="player" style={{
                        left: this.state.player_position_x,
                        bottom: this.state.player_position_y,
                        transform: "rotate(" + this.state.player_position_deg + "deg)"
                    }}></div>
                </div>
                <input type="text" className="dieu_khien" id="dieu_khien" onKeyUp={this.handleControllerOut} onKeyDown={this.handleController} />
            </div>
        );
    }
}

export default GameEvent;