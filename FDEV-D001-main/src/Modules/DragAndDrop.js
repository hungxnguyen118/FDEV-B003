import React, { Component } from 'react';

class DragAndDrop extends Component {

    constructor(props) {
        super(props);
        this.state = {
            flag_take: 0,
            position_x: 10,
            position_y: 10
        }
    }

    handleNam = () => {
        //console.log('nam');
        this.setState({
            flag_take: 1,
            position_x: this.state.position_x,
            position_y: this.state.position_y
        });
    }

    handleKeo = (e) => {
        //console.log('keo');
        console.log(e);
        if (this.state.flag_take) {
            //console.log('keo');
            let maximumposition_x = 1000 - 50;
            let maximumposition_y = 600 - 50;

            let position_cursor_x = e.clientX - 10;
            let position_cursor_y = e.clientY - 10;

            if(position_cursor_x >= maximumposition_x + 10 && position_cursor_y >= maximumposition_y + 10){
                this.setState({
                    flag_take: 1,
                    position_x: maximumposition_x,
                    position_y: maximumposition_y
                })
            }
            else if(position_cursor_x >= maximumposition_x){
                this.setState({
                    flag_take: 1,
                    position_x: maximumposition_x,
                    position_y: position_cursor_y
                })
            }
            else if(position_cursor_y >= maximumposition_y){
                this.setState({
                    flag_take: 1,
                    position_x: position_cursor_x,
                    position_y: maximumposition_y
                })
            }
            else{
                this.setState({
                    flag_take: 1,
                    position_x: position_cursor_x,
                    position_y: position_cursor_y
                })
            }

            
        }
    }

    handleTha = () => {
        //console.log("Tha");
        this.setState({
            flag_take: 0,
            position_x: this.state.position_x,
            position_y: this.state.position_y
        });
    }

    render() {
        return (
            <div>
                <div className="bang_chua" onMouseMove={this.handleKeo}>
                    <div className="vat_the" style={{ top: this.state.position_y, left: this.state.position_x }} onMouseDown={this.handleNam} onMouseUp={this.handleTha} ></div>
                </div>
            </div>
        );
    }
}

export default DragAndDrop;