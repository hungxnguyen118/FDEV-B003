import React, { Component } from 'react';

import LastestGame from '../Modules/LastestGame';
import ListGame from '../Modules/ListGame';
import Poster from '../Modules/Poster';
import Xbox from '../Modules/Xbox';

import { confirmAlert } from 'react-confirm-alert';

class TrangChu extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <ListGame handleaddToCart={this.props.handleAddToCart} />
                <LastestGame />
                <Poster />
                <Xbox />
                
            </div>
        );
    }
}

export default TrangChu;