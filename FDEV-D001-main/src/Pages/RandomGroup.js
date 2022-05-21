import React, { Component } from 'react';

class RandomGroup extends Component {

    constructor(props){
        super(props);
        this.state = {
            ds_member: [
                'Đoàn Huỳnh Thanh Duy',
                'Vũ Ngọc Thanh Trúc',
                'Nguyễn Linh Phú ',
                'Nguyễn Đình Dương',
                'Phạm Hải Nam',
                'Lê Cổ Đăng Huy',
                'Phạm Nguyễn Minh Phúc',
                'Ngô Đình Tấn Tài ',
                'Lý Thị Bảo Ngọc'
            ],
            ds_group: []
        }
    }

    handleRandomGroup = () => {
        let ds_member = this.state.ds_member;
        let so_luong_mang = ds_member.length;
        let ds_group = this.state.ds_group;
        

        if(so_luong_mang > 1){
            let random_number = Math.floor(Math.random() * so_luong_mang);
            console.log(random_number);

            if(ds_group.length > 0){
                var flag_kiem_tra = 0;
                for(var i = 0; i < ds_group.length; i++){
                    if(ds_group[i].member.length >= 2){
                        continue;
                    }
                    else {
                        ds_group[i].member.push(ds_member[random_number]);
                        ds_member.splice(random_number, 1);
                        this.setState({
                            ds_member: ds_member,
                            ds_group: ds_group
                        });
                        flag_kiem_tra = 1;
                    }
                }

                if(flag_kiem_tra == 0){
                    let member = [
                        ds_member[random_number]
                    ];
                    ds_group.push({member});
                    ds_member.splice(random_number, 1);
                    this.setState({
                        ds_member: ds_member,
                        ds_group: ds_group
                    });
                }

            }
            else{
                let member = [
                    ds_member[random_number]
                ];
                ds_group.push({member});
                ds_member.splice(random_number, 1);
                this.setState({
                    ds_member: ds_member,
                    ds_group: ds_group
                });
            }
        }
        
    }

    render() {
        return (
            <div>

                <button type="button" class="btn btn-primary" onClick={this.handleRandomGroup}>Random nè</button>
                <div className="member_need_to_defind_group">
                    Danh sách còn lại:
                    {
                        this.state.ds_member.map(member => {
                            return <div>{member}</div>
                        })
                    }
                </div>
                <div className="group_define">
                    {
                        this.state.ds_group.map((group, index) => {
                            return <div>
                                <div>Group {index + 1}</div>
                                <div>
                                    {
                                        group.member.map(member => {
                                            return <div>{member}</div>
                                        })
                                    }
                                </div>
                            </div>
                        })
                    }
                </div>
                
            </div>
        );
    }
}

export default RandomGroup;