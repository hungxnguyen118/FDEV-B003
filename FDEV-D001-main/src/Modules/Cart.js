import React, { Component } from 'react';
import './Cart.css'

class Cart extends Component {
    render() {
        return (
            <div className="container_cart">
                <div className="icon_gio_hang">
                    <img src="/images/shopping_cart.png" />
                    <div className="tong_so_luong">{this.props.TongSoLuong}</div>
                </div>
                <div className="danh_sach_item_gio_hang">
                    {this.props.CartItems.map(ItemCart => {
                        return <div className="item_gio_hang">
                            <div className="hinh_san_pham">
                                <img src={ItemCart.image} />
                            </div>
                            <div className="thong_tin_rut_gon_san_pham">
                                <div className="ten_san_pham">{ItemCart.name}</div>
                                <div className="so_luong">{ItemCart.quantity}</div>
                            </div>
                        </div>
                    })}
                </div>
            </div>
        );
    }
}

export default Cart;