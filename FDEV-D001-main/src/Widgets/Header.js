import React, { Component } from 'react';
import GreetingLogedIn from '../Modules/GreetingLogedIn';
import LoginForm from '../Modules/LoginForm';

import { NavLink } from "react-router-dom";

class Header extends Component {
    constructor(props) {
        super(props);
        this.state = {
            search_value: "",
            logedInFlag: false,
            user: {},
            list_user: [
                {
                    username: 'hungnguyen',
                    fullname: 'Hung Nguyen',
                    password: '123456'
                },
                {
                    username: 'hungnguyen1',
                    fullname: 'Hung Nguyen 1',
                    password: '123456'
                }
            ]
        }
    }

    componentDidMount(){
        let string_login = localStorage.getItem('login_user');
        if(string_login && string_login !== 'undefined' && string_login !== null){
            let user_data_login = JSON.parse(string_login);
            this.setState(prevState => {
                prevState.user = user_data_login;
                prevState.logedInFlag = true;
                return prevState;
            })
        }
    }

    handleChangeValueSearch = (e) => {
        //console.log(e.target.value);
        this.setState(prevState => {
            prevState.search_value = e.target.value;
            return prevState;
        });
    }

    handleSubmitSearchForm = (e) => {
        e.preventDefault();
        //console.log('test');
        window.location.href = window.location.href + "?s=" + this.state.search_value;
    }

    handleFunctionLogin = (username) => {
        this.setState(prevState => {
            prevState.logedInFlag = true;

            let user_login = prevState.list_user.find(user => user.username == username);
            //console.log(user_login);

            prevState.user = user_login;
            user_login.password = '';
            localStorage.setItem('login_user', JSON.stringify(user_login));

            return prevState;
        })
    }

    handleFunctionLogOut = () => {
        this.setState(prevState => {
            prevState.logedInFlag = false;
            prevState.user = {};
            localStorage.removeItem('login_user');
            return prevState;
        })
    }

    render() {

        let LogedInOrNot;

        if(this.state.logedInFlag){
            LogedInOrNot = <GreetingLogedIn user={this.state.user} handleLogOut={this.handleFunctionLogOut} />
        }
        else {
            LogedInOrNot = <LoginForm handleLogin={this.handleFunctionLogin} />
        }

        return (
            <div>
                <div className="top-banner">
                    <div className="header">
                        <div className="container">
                            <div className="headr-left">
                                <div className="social">
                                    <a href="#"><i className="facebook"></i></a>
                                    <a href="#"><i className="twitter"></i></a>
                                    <a href="#"><i className="gplus"></i></a>
                                    <a href="#"><i className="pin"></i></a>
                                    <a href="#"><i className="youtube"></i></a>
                                </div>
                                <div className="search">
                                    <form onSubmit={this.handleSubmitSearchForm}>
                                        <input type="submit" value="" />
                                        <input type="text" value={this.state.search_value} onChange={this.handleChangeValueSearch} placeholder="Search..." />
                                    </form>
                                </div>
                                <div className="clearfix"></div>
                            </div>
                            <div className="headr-right">
                                <div className="details">
                                    <ul>
                                        <li><a href="mailto@example.com"><span className="glyphicon glyphicon-envelope" aria-hidden="true"></span>info(at)example.com</a></li>
                                        <li><span className="glyphicon glyphicon-earphone" aria-hidden="true"></span>(+1)000 123 456789</li>
                                    </ul>
                                </div>
                            </div>
                            <div className="clearfix"></div>
                        </div>
                    </div>
                    <div className="banner-info">
                        <div className="container">
                            <div className="logo">
                                <h1><a href="index.html">GAME BOX</a></h1>
                            </div>
                            <div className="top-menu">
                                <span className="menu"></span>
                                <ul className="nav1">
                                    {/* <li className="active"><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="reviews.html">Reviews</a></li>
                                    <li><a href="typo.html">News</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="contact.html">Mail</a></li> */}
                                    <li>
                                        <NavLink to="/" className={({isActive}) => (isActive)?'btn-link active':'btn-link'}>Home</NavLink>
                                    </li>
                                    <li>
                                        <NavLink to="/gio-hang" className={({isActive}) => (isActive)?'btn-link active':'btn-link'}>Giỏ Hàng</NavLink>
                                    </li>
                                    <li>
                                        <NavLink to="/random" className={({isActive}) => (isActive)?'btn-link active':'btn-link'}>Random</NavLink>
                                    </li>
                                    <li>
                                        {LogedInOrNot}
                                    </li>
                                </ul>
                            </div>


                            <div className="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div className="slider">
                    <div className="callbacks_container">
                        <ul className="rslides" id="slider">

                            <div className="slid banner1">
                                <div className="caption">
                                    <h3>Donec id diam nec ex luctus congue nec sed mi.</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec pellentesque ex. Morbi iaculis mi in varius auctor. Nullam feugiat erat ex, eu vehicula velit efficitur non.</p>
                                </div>
                            </div>


                            <div className="slid banner2">
                                <div className="caption">
                                    <h3>Pellentesque eu ante quis elit interdum cursus.</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec pellentesque ex. Morbi iaculis mi in varius auctor. Nullam feugiat erat ex, eu vehicula velit efficitur non.</p>
                                </div>
                            </div>


                            <div className="slid banner3">
                                <div className="caption">
                                    <h3>Fusce id urna ut felis feugiat fringilla sed quis nisl.</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec pellentesque ex. Morbi iaculis mi in varius auctor. Nullam feugiat erat ex, eu vehicula velit efficitur non.</p>
                                </div>
                            </div>

                        </ul>
                    </div>
                </div>


            </div>
        );
    }
}

export default Header;