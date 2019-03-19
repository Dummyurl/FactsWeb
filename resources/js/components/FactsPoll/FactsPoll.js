import axios from 'axios'
import React, { Component } from 'react'
import AllFacts from '../AllFacts/AllFacts';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import TimeAgo from 'timeago-react'; // var TimeAgo = require('timeago-react');
import PollResult from '../PollResult/PollResult';


class FactsPoll extends Component {
    constructor(){
        super();
        this.state= {
            facts: [],
            publicpoll:[],
            name: '',
            persons: [],
            clicks:1,
            likes: 5,
            updated: false,
            disabledButton: false,
            bgColor:'black',
            background: ''
          }
         
    }
    componentDidMount () {
        axios.get(`/factapi`).then(response => {
          this.setState({
            facts: response.data
            
          })
        const todaysfact= this.state.facts[0].home[0];
        const likecount= this.state.facts[0].home[0].like;
        // console.log(todaysfact);
        // console.log(likecount);
        })

        axios.get(`/publicpoll`).then(response => {
            this.setState({
                publicpoll: response.data
            })
          // const todaysfact= this.state.siteapidata[0].sitedata[0];
          // const bodo = siteapi.sitedata[0];
          // const likecount= boda.siteslogan;
         
          })
        
        // console.log(todaysfact);
      }
    //   likeClick() {
    //       this.setState(prevState => {
    //           return {
                    
    //           }
    //       })
    //   }
    
    updateLikes = () => {

        if(!this.state.updated) {
          this.setState((prevState, props) => {
            return {
              likes: prevState.likes + 1,
              updated: true
            };
          });
          this.setState({
            bgColor: '#a93c46',
            // padding: 1px 9px;
            background: '#fde2e4'
            // background: '#ddecfb'
          })
        } else {
    
        //   this.setState((prevState, props) => {
        //     return {
        //       likes: prevState.likes - 1,
        //       updated: false,
        //       bgColor: "black",
        //       background: ""
        //     };
        //   });

        }
    
    
    }

    IncrementItem = () => {
        this.setState({ clicks: this.state.clicks + 1 });
        // this.setState({ disabledButton: true });
        this.setState({
            bgColor: '#a93c46',
            // padding: 1px 9px;
            background: '#fde2e4'
            // background: '#ddecfb'
          })
        this.refs.btn.setAttribute("disabled", "disabled");
        console.log(this.state.clicks);
      }
    DecreaseItem = () => {
        this.setState({ clicks: this.state.clicks - 1 });
    }
    ToggleClick = () => {
        this.setState({ show: !this.state.show });
    }

    // handleChange (event) {
    //     this.setState({ name: event.target.value });
    // }
    
    //   handleSubmit (event) {
    //     event.preventDefault();
    
    //     const user = {
    //       name: this.state.name,
    //       type:'varun'
    //     };
    
    //     axios.post(`/factapi`, { user })
    //       .then(res => {
    //         console.log(res);
    //         console.log(res.data);
    //       })
    //     axios.get(`/factapi`)
    //         .then(res => {
    //         const persons = res.data;
    //         this.setState({ persons });
    //         console.log(persons);
    //     })
    //   }
      
  render () {
        const { facts } = this.state
        const { publicpoll } = this.state;
        // console.log(likecounting);
                // console.log(todaysfact);
                // console.log(facts);
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
                        <Link className="viewall no-decoration" to="/allfacts"><span>View All</span><i className=" la la-caret-right"></i></Link>
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
                                    {/* <form id="likeform" method="POST"> */}
                                        <span className="likecount" style={{background:this.state.background}} onClick={this.updateLikes} ref="btn" >
                                        <i style={{color:this.state.bgColor}} className="la la-thumbs-o-up"></i> <span> {this.state.likes}</span></span>
                                        {/* <i className="la la-thumbs-o-up"></i> <span> {rowdata.home[0].like}</span></span> */}
                                    {/* </form> */}
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
                            {/* <Link className="viewall no-decoration" to="/allfacts"><span>View All</span><i className=" la la-caret-right"></i></Link> */}
                            Facts of the day
                            
                            </div>
                            {description}
                        </div>
                    </div>
                    <div className="col-md-4">
                    {/* <div className="pp">
                        <div className="pp-header">
                        Public Poll
                        </div>
                        <form >
                        <div>
                                {publicpoll.map((item, index) => (
                                    <div className="pp__wrp text-center">
                                        <h5 className="mb-5">{item.question}</h5> 
                                <ul>
                                    {item.options.map((company, index) =>
                               
                                    // <label className="btn btn-primary btn-block">{company.question}
                                        <input className="btn btn-primary btn-block" type="button" value={company.question}/>     
                                    // </label>                                   
                                        )}
                                </ul>
                            </div>
                            
                                ))}
                            </div>
                        </form>
                    </div> */}
                    <PollResult />
                    </div>
                </div>
            </div>
            <Router>
                <div>
                  {/* <Route exact path="/" component={AllFacts} /> */}
                  {/* <Route path="/allfacts" component={AllFacts} /> */}
                  {/* <Route path="/topics" component={Topics} /> */}
                </div>
              </Router>
        </section>
    )
    }
}

    export default FactsPoll;