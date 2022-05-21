import React, { Component } from 'react';
const axios = require('axios').default;

class DSProduct extends Component {
    constructor(props) {
        super(props);
        this.state = {
            ds_sp: [],
            so_trang: 0,
            ten_sach: '',
            don_gia: '',
            id: ''
        };

        this.buttonShowEditPopup = React.createRef()
    }

    componentDidMount() {
        axios.get('http://localhost:4000/products?page=0')
        .then( (response) => {
          // handle success
          //console.log(response);
          this.setState(prevState => {
            prevState.ds_sp = response.data;  
            return prevState;
          })
        })
        .catch( (error) => {
          // handle error
          console.log(error);
        })
        .then(function () {
          // always executed
        });

        axios.get('http://localhost:4000/products/total-page')
        .then( (response) => {
            // handle success
            //console.log(response);
            this.setState(prevState => {
                prevState.so_trang = response.data.so_trang;
                return prevState;
            })
        })
        .catch( (error) => {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
    }

    handleChangePage = (e) => {
        //console.log(e.target.getAttribute('data-page'));
        let page_chose = e.target.getAttribute('data-page');
        axios.get('http://localhost:4000/products?page=' + page_chose)
        .then( (response) => {
          // handle success
          //console.log(response);
          this.setState(prevState => {
            prevState.ds_sp = response.data;  
            return prevState;
          })
        })
        .catch( (error) => {
          // handle error
          console.log(error);
        })
        .then(function () {
          // always executed
        });
    }

    handleChangeInput = (e) => {
        //console.log( e.target.name);
        this.setState(prevState => {
            prevState[e.target.name] = e.target.value;
            return prevState
        })
    }

    handleShowPopupEdit = (e) => {
        //console.log(e.target.getAttribute('data-id'));
        let id_chose = e.target.getAttribute('data-id');
        let item_sua = this.state.ds_sp.find(item => item.id == id_chose);

        this.setState(prevState => {
            prevState.id = item_sua.id;
            prevState.ten_sach = item_sua.ten_sach;
            prevState.don_gia = item_sua.don_gia;
            return prevState;
        })

        this.buttonShowEditPopup.current.click();
    }

    handleNoticeShowPopupEdit = () => {
        //console.log("popup edit is runing");
    }

    handleSubmitForm = (e) => {
        e.preventDefault();

        axios.put('http://localhost:4000/product', { ten_sach: this.state.ten_sach, don_gia: this.state.don_gia, id: this.state.id })
            .then((response) => {
                // handle success
                console.log(response);
                let temp = this.state.ds_sp;
                for(var i = 0; i < temp.length; i++){
                    if(temp[i].id == this.state.id){
                        temp[i].ten_sach = this.state.ten_sach;
                        temp[i].don_gia = this.state.don_gia;
                    }
                }
                this.setState(prevState => {
                    prevState.ds_sp = temp;
                    return prevState;
                })
                this.buttonShowEditPopup.current.click();
            })
            .catch((error) => {
                // handle error
                console.log(error);
                alert('save không được, thử lại đi')
            })
            .then(function () {
                // always executed
            });
    }

    render() {
        let ds_trang = [];
        for(let i = 0; i < this.state.so_trang; i++){
            ds_trang.push(i);
        }

        return (
            <div>
                <div>
                Trang danh sách sản phẩm
                {this.state.so_trang}
                </div>
                <div>
                    {
                        this.state.ds_sp.map(itemProduct => {
                            return <div data-id={itemProduct.id} onClick={this.handleShowPopupEdit}>{itemProduct.id} - {itemProduct.ten_sach}</div>
                        })
                    }
                </div>
                <div className="phan_trang">
                    <button type="button" class="btn btn-primary">first</button>
                    <button type="button" class="btn btn-primary">prev</button>
                    <div className="ds_trang">
                        {
                            ds_trang.map(item_trang => {
                                return <button type="button" onClick={this.handleChangePage} data-page={item_trang} class="btn btn-primary">{item_trang + 1}</button>
                            })
                        }
                    </div>
                    <button type="button" class="btn btn-primary">next</button>
                    <button type="button" class="btn btn-primary">last</button>
                </div>

                
                <a class="btn btn-primary" ref={this.buttonShowEditPopup} onClick={this.handleNoticeShowPopupEdit} data-toggle="modal" href='#modal-edit-popup'>Trigger modal</a>
                <div class="modal fade" id="modal-edit-popup">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Modal title</h4>
                            </div>
                            <form onSubmit={this.handleSubmitForm}>
                                <div class="modal-body">
                                        <legend>Sửa sản phẩm</legend>

                                        <div class="form-group" style={{display: 'none'}}>
                                            <label for="">ID</label>
                                            <input type="text" value={this.state.id} name="id" />
                                        </div>

                                        <div class="form-group">
                                            <label for="">Tên sách</label>
                                            <input type="text" onChange={this.handleChangeInput} value={this.state.ten_sach} name="ten_sach" class="form-control" id="" placeholder="Input field" />
                                        </div>

                                        <div class="form-group">
                                            <label for="">Đơn giá</label>
                                            <input type="text" onChange={this.handleChangeInput} value={this.state.don_gia} name="don_gia" class="form-control" id="" placeholder="Input field" />
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        );
    }
}

export default DSProduct;