import React, { Component } from 'react';
import ItemFormCart from './ItemFormCart';

class FormCart extends Component {
    constructor(props) {
        super(props);
        //console.log(this.props.handleAddToCart)
    }

    handleremoveCartProcess = () => {
        this.props.handleremoveCart();
    }

    render() {
        return (
            <div>
                
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {this.props.CartItems.map(ItemCart => {
                                return <ItemFormCart ItemCart={ItemCart} 
                                handleAddToCart={this.props.handleAddToCart}
                                handleDescreaseItemCart={this.props.handleDescreaseItemCart}
                                handleRemoveItemCart={this.props.handleRemoveItemCart} />
                            })}
                        </tbody>
                    </table>
                </div>
                <div className="action">
                    
                    <button onClick={this.handleremoveCartProcess} type="button" class="btn btn-danger">Huỷ toàn bộ giỏ hàng</button>
                    
                </div>
            </div>
        );
    }
}

export default FormCart;