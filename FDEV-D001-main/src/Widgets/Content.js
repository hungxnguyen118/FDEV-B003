import React, { Component } from 'react';
import Cart from '../Modules/Cart';
import GioHang from '../Pages/GioHang';

import TrangChu from "../Pages/TrangChu";

import { Route, Routes } from 'react-router-dom'
import RandomGroup from '../Pages/RandomGroup';
import DetailProduct from '../Pages/DetailProduct';

import { confirmAlert } from 'react-confirm-alert';
import DSProduct from '../Pages/DSProduct';
import ManageProduct from '../Pages/ManageProduct';


class Content extends Component {

    constructor(props) {
        super(props);
        this.state = {
            mang_gio_hang: [],
            so_luong_gio_hang: 0,
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


    componentDidMount() {
        let data_string_mang_gio_hang = localStorage.getItem('cart');
        
        if(data_string_mang_gio_hang && data_string_mang_gio_hang !== 'undefined' && data_string_mang_gio_hang !== null){
            let mang = JSON.parse(data_string_mang_gio_hang);

            this.setState(prevState => {
                prevState.mang_gio_hang = mang;
                return prevState;
            })

            this.countNumberQuantityInCart(mang);
        }
    }

    countNumberQuantityInCart = (mang) => {
        var tong_so_luong = 0;

        for(var i = 0; i < mang.length; i++){
            tong_so_luong += mang[i].quantity;
        }

        this.setState(prevState => {
            prevState.so_luong_gio_hang = tong_so_luong;
            return prevState;
        });
    }


    addToCart = (item) => {
        //console.log(item);
        let mang = this.state.mang_gio_hang;
        if(mang){
            let flag = 0;
            for(var i = 0; i < mang.length; i++){
                if(mang[i].id == item.id){
                    mang[i].quantity += 1;
                    flag = 1;
                }
            }
            if(flag == 0){
                item.quantity = 1;
                mang.push(item);
                
            }
        }
        else {
            item.quantity = 1;
            mang.push(item);
        }

        this.setState(prevState => {
            prevState.mang_gio_hang = mang;
            return prevState;
        })

        this.saveCartIntoLocalStorage(mang);
        this.countNumberQuantityInCart(mang);
    }

    DescreaseItemCart = (item) => {
        let mang = this.state.mang_gio_hang;
        for(var i = 0; i < mang.length; i++){
            if(mang[i].id == item.id){
                if(mang[i].quantity > 1){
                    mang[i].quantity -= 1;
                }
                else{
                    //do nothing
                }
            }
        }

        this.setState(prevState => {
            prevState.mang_gio_hang = mang;
            return prevState;
        })
        
        this.saveCartIntoLocalStorage(mang);
        this.countNumberQuantityInCart(mang);
    }

    RemoveItemCart = (item) => {

        const options = {
            title: 'Confirm',
            message: 'Bạn chắc chắn muốn xoá item này khỏi giỏ hàng hay không?',
            buttons: [
              {
                label: 'Yes',
                onClick: () => {
                    let mang = this.state.mang_gio_hang;

                    for(var i = 0; i < mang.length; i++){
                        if(mang[i].id == item.id){
                            mang.splice(i, 1);
                        }
                    }
            
                    //console.log(mang);
                    this.setState(prevState => {
                        prevState.mang_gio_hang = mang;
                        return prevState;
                    });

                    this.saveCartIntoLocalStorage(mang);
                    this.countNumberQuantityInCart(mang);
                }
              },
              {
                label: 'No',
                onClick: () => {
                    //do nothing
                }
              }
            ],
            childrenElement: () => <div />,
            closeOnEscape: true,
            closeOnClickOutside: true,
            keyCodeForClose: [8, 32],
            willUnmount: () => {},
            afterClose: () => {},
            onClickOutside: () => {},
            onKeypressEscape: () => {},
            overlayClassName: "overlay-custom-class-name"
        };
          
        confirmAlert(options);
        
    }

    saveCartIntoLocalStorage = (mang_gio_hang) => {
        let data_save = JSON.stringify(mang_gio_hang);
        localStorage.setItem('cart', data_save);
    }

    removeCart = () => {
        const options = {
            title: 'Confirm',
            message: 'Bạn chắc chắn muốn xoá item này khỏi giỏ hàng hay không?',
            buttons: [
              {
                label: 'Yes',
                onClick: () => {
                    //console.log(mang);
                    this.setState(prevState => {
                        prevState.mang_gio_hang = [];
                        return prevState;
                    });

                    this.saveCartIntoLocalStorage([]);
                    this.countNumberQuantityInCart([]);
                }
              },
              {
                label: 'No',
                onClick: () => {
                    //do nothing
                }
              }
            ],
            childrenElement: () => <div />,
            closeOnEscape: true,
            closeOnClickOutside: true,
            keyCodeForClose: [8, 32],
            willUnmount: () => {},
            afterClose: () => {},
            onClickOutside: () => {},
            onKeypressEscape: () => {},
            overlayClassName: "overlay-custom-class-name"
        };
          
        confirmAlert(options);
    }
    

    render() {
        return (
            <div>
                <Routes>
                    <Route path="/" element={<TrangChu handleAddToCart={this.addToCart} />} />
                    <Route path="/gio-hang" element={<GioHang mang_gio_hang={this.state.mang_gio_hang}
                    handleAddToCart={this.addToCart}
                    handleDescreaseItemCart={this.DescreaseItemCart}
                    handleRemoveItemCart={this.RemoveItemCart}
                    handleremoveCart={this.removeCart}
                    />} />
                    <Route path="/random" element={<RandomGroup />} />
                    <Route path="/products" element={<DSProduct />} />
                    <Route path="/product/:id_product" element={<DetailProduct danhsachgame={this.state.listgame} />} />

                    {/* admin route */}
                    <Route path="/admin/products" element={<ManageProduct />} />
                </Routes>
                
                <Cart CartItems={this.state.mang_gio_hang} TongSoLuong={this.state.so_luong_gio_hang} />
            </div>
        );
    }
}

export default Content;