import React, { Component } from 'react';
import FormCart from '../Modules/FormCart';

class GioHang extends Component {

    constructor(props) {
        super(props);
    }

    

    render() {
        return (
            <div>
                <FormCart CartItems={this.props.mang_gio_hang} 
                handleAddToCart={this.props.handleAddToCart}
                handleDescreaseItemCart={this.props.handleDescreaseItemCart} 
                handleRemoveItemCart={this.props.handleRemoveItemCart}
                handleremoveCart={this.props.handleremoveCart} />
            </div>
        );
    }
}

export default GioHang;