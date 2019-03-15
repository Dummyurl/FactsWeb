// import axios from 'axios'
import React, { Component } from 'react'
import TimeAgo from 'timeago-react'; // var TimeAgo = require('timeago-react');
 



class FactsPoll extends Component {
    constructor(props){
        super(props);
        this.state= {
            facts: [],
            
        }
    }
    componentDidMount () {
        axios.get('/factapi').then(response => {
          this.setState({
            facts: response.data
            
          })
          console.log(response.data);
        //   console.log(facts[0]);
        // console.log(this.state.facts[0].home[0]);
        const todaysfact= this.state.facts[0].home[0];
        const likecount= this.state.facts[0].home[0].like;
        console.log(todaysfact);
        console.log(likecount);
        })
        
        // console.log(todaysfact);
      }
    //   likeClick() {
    //       this.setState(prevState => {
    //           return {
                    
    //           }
    //       })
    //   }

  render () {
        const { facts } = this.state
        const likecounting = facts;
        console.log(likecounting);
                // console.log(todaysfact);
        const description = facts.map((rowdata,i)=>
        
            <div key={i}>
                {
                    // rowdata.home.map((subRowData,k)=>
                        // <div >
                        //     <img  src={subRowData.image}></img>
                        //     <label>{subRowData.description}</label>
                        //     <label  className="category_head">{subRowData.category_title}</label>
                        //     {/* <label></label> */}
                        // </div> 
                        <div key={i} className="factsod__wrapper">
                        <a className="viewall no-decoration" href="">
                            <span> View All</span> <i className=" la la-caret-right"></i>
                        </a>
                        <div className="img-wpr">
                            {/* <img src={subRowData.image} alt="todaysfact" /> */}
                            <img src={rowdata.home[0].image} alt="todaysfact" />
                        </div>
                        <div className="factsod__detail">
                            <h6>
                            {rowdata.description}
                            </h6>
                            <div className="cholder">
                                <div className="factsod__counts">
                                    <span className="badge education"> {rowdata.home[0].category_title}</span>
                                    <span className="time">
                                    <i className="la la-calendar-o"></i>

                                    <span><TimeAgo
                                        datetime={rowdata.home[0].updated_at} 
                                         /></span>
                                    </span>
                                    <span className="likecount">
                                    <i className="la la-thumbs-o-up"></i> <span> {rowdata.home[0].like}</span></span>
                                </div>
                                <div className="factsod__facts-share">
                                    <a href="" className="no-decoration"><i className="la la-facebook"></i></a>
                                    <a href="" className="no-decoration"><i className="la la-twitter"></i></a>
                                    <a href="" className="no-decoration"><i className="la la-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> 
                    // )   
                }
            </div>  
        )
    return (
        <section className="section-padding-y fact-poll">
            <div className="container">
                <div className="row">
                    <div className="col-md-8 relative">
                        <div className="factsod">
                            <div className="factsod__header">
                            Facts of the day
                            </div>
                            {description}
                            {/* <div className="factsod__wrapper">
                                <a className="viewall no-decoration" href="">
                                    <span> View All</span> <i className=" la la-caret-right"></i>
                                </a>
                                <div className="img-wpr">
                                    <img src="img/assets/fod.jpg" alt="todaysfact" />
                                </div>
                                <div className="factsod__detail">
                                    <h6>
                                    Health status of Nepal regarding the age and life Health
                                    status of Nepal regarding the age and life expectancy
                                    </h6>
                                    <div className="cholder">
                                        <div className="factsod__counts">
                                            <span className="badge education"> EDUCATION</span>
                                            <span className="time">
                                            <i className="la la-calendar-o"></i>

                                            <span>1hr ago</span></span>
                                            <span className="likecount">
                                            <i className="la la-thumbs-o-up"></i> <span> 240</span></span>
                                        </div>
                                        <div className="factsod__facts-share">
                                            <a href="" className="no-decoration"><i className="la la-facebook"></i></a>
                                            <a href="" className="no-decoration"><i className="la la-twitter"></i></a>
                                            <a href="" className="no-decoration"><i className="la la-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> */}
                        </div>
                    </div>
                    <div className="col-md-4">
                    <div className="pp">
                        <div className="pp-header">
                        Public Poll
                        </div>
                        <div className="pp__wrp text-center">
                        <h5 className="mb-5">What do you think is the risk of getting cancer after age 40?</h5>
                        <button className="btn btn-primary btn-block"> Yes </button>
                        <button className="btn btn-primary btn-block"> No</button>
                        <button className="btn btn-primary btn-block"> Neutral </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    )
    }
}

    export default FactsPoll;