import React, { Component } from 'react';
import "./GreetingLogedIn.css"

class GreetingLogedIn extends Component {
    constructor (props){
        super(props);
    }

    handleLogoutProcess = () => {
        this.props.handleLogOut();
    }

    render() {
        return (
            <div className="containerLogedIn">
                <div className="greeting">
                    Xin Chào {this.props.user.fullname}
                </div>
                <button type="button" class="btn btn-danger" onClick={this.handleLogoutProcess}>Logout</button>
            </div>
        );
    }
}

export default GreetingLogedIn;