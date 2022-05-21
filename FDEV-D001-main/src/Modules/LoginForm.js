import React, { Component } from 'react';
import './LoginForm.css';

class LoginForm extends Component {
    constructor (props){
        super(props);
        this.state = {
            showOrHideForm: false,
            placeholderUsername: 'username/email',
            placeholderPassword: 'password',
            username: '',
            password: ''
        };
    }

    handleShowOrHideForm = () => {
        if(this.state.showOrHideForm){
            this.setState(prevState => {
                prevState.showOrHideForm = false;
                return prevState;
            })
        }
        else {
            this.setState(prevState => {
                prevState.showOrHideForm = true;
                return prevState;
            })
        }
    }

    handleChangeInput = (e) => {
        //console.log( e.target.name);
        this.setState(prevState => {
            prevState[e.target.name] = e.target.value;
            return prevState
        })
    }

    handleLoginProcess = () => {
        this.props.handleLogin(this.state.username);
    }

    render() {
        return (
            <div>
                
                <button type="button" onClick={this.handleShowOrHideForm} class="btn btn-info">Login</button>
                
                <form class={"form-horizontal login_form " + this.state.showOrHideForm } onSubmit={this.handleLoginProcess} role="form">
                        <div class="form-group">
                            <legend>Login Form</legend>
                        </div>
                
                        <div class="form-group">
                            <div class="col-sm-12">username/email:</div>
                            <div class="col-sm-12">
                                <input type="text" name="username" onChange={this.handleChangeInput} id="input" class="form-control" title="username" placeholder={this.state.placeholderUsername} />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">password:</div>
                            <div class="col-sm-12">
                                <input type="password" name="password" onChange={this.handleChangeInput} id="input" class="form-control" title="password"  placeholder={this.state.placeholderPassword} />
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
        );
    }
}

export default LoginForm;