import React, { Component } from 'react';
import ShortGame from './ShortGame';

class ListGame extends Component {
    constructor (props) {
        super(props);
        this.state = {
            listgame: [
               {
                id: 1,
                typegame: 'Action Games',
                name: 'Nulla elementum nunc tempus.',
                image: 'images/t1.jpg'
               },
               {
                id: 2,
                typegame: 'Racing Games',
                name: 'Nulla elementum nunc tempus.',
                image: 'images/t3.jpg'
               },
               {
                id: 3,
                typegame: '3D Games',
                name: 'Nulla elementum nunc tempus.',
                image: 'images/t4.jpg'
               },
               {
                id: 4,
                typegame: 'Arcade Games',
                name: 'Nulla elementum nunc tempus.',
                image: 'images/t2.jpg'
               }
            ]
        }
    }

    render() {
        return (
            <div className="content">
                <div className="container">
                    <div className="top-games">
                        <h3>Top Games</h3>
                        <span></span>
                    </div>
                    <div className="top-game-grids">
                        <ul id="flexiselDemo1">
                            {this.state.listgame.map(item => {
                                return <ShortGame game={item} handleaddToCart={this.props.handleaddToCart} />
                            })}
                        </ul>
                    </div>
                </div>
            </div>
        );
    }
}

export default ListGame;