import React, { Component } from 'react';
import { useParams } from "react-router-dom";

function withParams(Component) {
    return props => <Component {...props} params={useParams()} />;
}

class DetailProduct extends Component {

    constructor (props) {
        super(props);
        let param = this.props.params;
        //console.log(param);
        let product_detail = this.props.danhsachgame.find(item => item.id == param.id_product);
        //console.log(product_detail);
        this.state = {
            info_product: product_detail
        }
    }

    render() {
        return (
            <div>
                Trang chi tiết sản phẩm
                <div>
                    {this.state.info_product.typegame}
                </div>
                <div>
                    {this.state.info_product.name}
                </div>
                <img src={this.state.info_product.image} />
            </div>
        );
    }
}

export default withParams(DetailProduct);