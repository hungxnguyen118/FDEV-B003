import React, { Component } from 'react';
import './RegisterForm.css'

class RegisterForm extends Component {
    constructor(props){
        super(props);
        this.state = {
            email: '',
            valid_email: '',
            message_valid_email: '',
            password: '',
            valid_password: '',
            message_valid_password: '',
            re_password: '',
            fullname: '',
            phone: '',
            address: '',
            gender: 'Female'
        };
    }

    handleChangeInput = (e) => {
        //console.log( e.target.name);
        this.setState(prevState => {
            prevState[e.target.name] = e.target.value;
            return prevState
        })
    }

    handleCheckInput = (e) => {
        //console.log(e.target.name, e.target.value, this.state[e.target.name]);
        if(e.target.name == 'email'){
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            //console.log(re.test(e.target.value));
            if(re.test(e.target.value)){//true
                this.setState(prevState => {
                    prevState.valid_email = true;
                    prevState.message_valid_email = '';
                    return prevState;
                })
            }
            else{//false
                this.setState(prevState => {
                    prevState.valid_email = false;
                    prevState.message_valid_email = 'Email is invalid';
                    return prevState;
                })
            }
        }

        if(e.target.name == 'password'){
            if(e.target.value.length < 8){
                this.setState(prevState => {
                    prevState.valid_password = false;
                    prevState.message_valid_password = "Password must have at least 8 character"
                    return prevState;
                })
            }
            else{
                this.setState(prevState => {
                    prevState.valid_password = true;
                    prevState.message_valid_password = ""
                    return prevState;
                })
            }
        }
    }

    handleSubmitForm = (e) => {
        e.preventDefault();

        if(this.state.valid_email && this.state.valid_password){
            //toàn bộ rule check hợp lệ
            //console.log('sẽ gửi form');
            alert('Tài khoản đã được tạo. Vui lòng kiểm tra email');
        }
        else{
            //console.log('Form chưa đc gửi vì phải hợp lệ toàn bộ các tiêu chí');
            alert('Form chưa đc gửi vì phải hợp lệ toàn bộ các tiêu chí');

            if(this.state.valid_email){
                //do nothing
            }
            else{
                this.setState(prevState => {
                    prevState.valid_email = false;
                    prevState.message_valid_email = 'this field is required';
                    return prevState;
                })
            }

            if(this.state.valid_password){
                //do nothing
            }
            else{
                this.setState(prevState => {
                    prevState.valid_password = false;
                    prevState.message_valid_password = "this field is required"
                    return prevState;
                })
            }
        }
    }

    render() {
        return (
            <div className="container">
                
                <form className="form-horizontal" role="form" onSubmit={this.handleSubmitForm}>
                        <div className="form-group">
                            <legend>Register Form</legend>
                        </div>

                        <div className="form-group">
                            <div className="col-sm-2">
                                Email (*)
                            </div>
                            <div className="col-sm-10">
                                <input type="text" onKeyUp={this.handleCheckInput} onChange={this.handleChangeInput} 
                                value={this.state.email} name="email" id="email" class={'form-control ' + this.state.valid_email} title="" />
                                <div className="error_hint">
                                    {this.state.message_valid_email}
                                </div>
                            </div>
                        </div>

                        <div className="form-group">
                            <div className="col-sm-2">
                                Password (*)
                            </div>
                            <div className="col-sm-10">
                                <input type="password" onKeyUp={this.handleCheckInput} onChange={this.handleChangeInput} 
                                value={this.state.password} name="password" id="password" class={'form-control ' + this.state.valid_password} title="" />
                                <div className="error_hint">
                                    {this.state.message_valid_password}
                                </div>
                            </div>
                        </div>

                        <div className="form-group">
                            <div className="col-sm-2">
                                Re-password
                            </div>
                            <div className="col-sm-10">
                                <input type="password" onChange={this.handleChangeInput} value={this.state.re_password} name="re_password" id="re_password" class="form-control" title="" />
                            </div>
                        </div>
                
                        <div className="form-group">
                            <div className="col-sm-2">
                                Full Name
                            </div>
                            <div className="col-sm-10">
                                <input type="text" onChange={this.handleChangeInput} value={this.state.fullname} name="fullname" id="fullname" class="form-control" title="" />
                            </div>
                        </div>

                        <div className="form-group">
                            <div className="col-sm-2">
                                Phone
                            </div>
                            <div className="col-sm-10">
                                <input type="text" onChange={this.handleChangeInput} value={this.state.phone} name="phone" id="phone" class="form-control" title="" />
                            </div>
                        </div>

                        <div className="form-group">
                            <div className="col-sm-2">
                                Address
                            </div>
                            <div className="col-sm-10">
                                <input type="text" onChange={this.handleChangeInput} value={this.state.address} name="address" id="address" class="form-control" title="" />
                            </div>
                        </div>

                        <div className="form-group">
                            <div className="col-sm-2">
                                Gender
                            </div>
                            <div className="col-sm-10">
                                <select name="gender" id="gender" onChange={this.handleChangeInput} value={this.state.gender} class="form-control" title="">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                        
                
                        <div className="form-group">
                            <div className="col-sm-10 col-sm-offset-2">
                                <button type="submit" className="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
                
            </div>
        );
    }
}

export default RegisterForm;