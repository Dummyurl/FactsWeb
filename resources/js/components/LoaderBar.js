import React, { Component } from 'react'
import Loading from 'react-loading-bar'
import 'react-loading-bar/dist/index.css'

 class LoaderBar extends Component {

    constructor(props){
        super(props);
        this.state= {
            show: true
        }
        this.onShow = this.onShow.bind(this);
        this.onHide = this.onHide.bind(this);
    }
    // onShow = ()=> {
    //     this.setState({ show: true })
    //   }
      
    // onHide = ()=> {
    // this.setState({ show: false })
    // }
    
    onShow() {
        this.setState({ show: true })
    }
    onHide() {
        this.setState({ show: false })
    }
    componentDidMount(){
        {this.onShow()}
        // {this.onHide()}    
    }
    render(){
       
        return(
            <div>
                <Loading
                show={this.state.show}
                color="red"
                />

                <button
                  className='btn btn-primary btn-sm'
                  onClick={this.onShow}>
                  Mark as completed
                </button>

                <button
                type="button"
                onClick={this.onHide}>
                hide
                </button>
            </div>
        )
    }
 }
export default LoaderBar;