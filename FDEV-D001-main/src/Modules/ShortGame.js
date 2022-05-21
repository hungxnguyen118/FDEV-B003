import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class ShortGame extends Component {
    constructor(props) {
        super(props);
    }

    handleaddToCartProcess = () => {
        this.props.handleaddToCart(this.props.game);
    }

    render() {
        return (
            <li>
                <div className="game-grid">
                    <h4>{this.props.game.typegame}</h4>
                    <p>{this.props.game.name}</p>
                    <img src={this.props.game.image} className="img-responsive" alt="" />
                    <div className="mask_interface"></div>
                    <div className="btn_view_detail">
                        <Link to={"/product/" + this.props.game.id}>
                            <button type="button" class="btn btn-success">xem chi tiết</button>
                        </Link>
                    </div>
                    <button type="button" onClick={this.handleaddToCartProcess} className="btn btn-info btn_add_to_cart">Thêm vào giỏ hàng</button>
                </div>
            </li>
        );
    }
}

export default ShortGame;