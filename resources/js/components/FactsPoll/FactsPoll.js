import axios from 'axios'
import React, { Component } from 'react'
import AllFacts from '../AllFacts/AllFacts';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import TimeAgo from 'timeago-react'; // var TimeAgo = require('timeago-react');
import PollResult from '../PollResult/PollResult';
import {FacebookShareCount } from 'react-share';



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
            optionbool: true,
            displayoption:'block',
            disabledButton: false,
            bgColor:'black',
            background: ''
          }
        //   this.handleChange= this.handleChange.bind(this)
          this.handleSubmit= this.handleSubmit.bind(this)
        //   this.optionClick= this.optionClick.bind(this)
         
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

    // onClick(event) {
    //     optionClick();
    //     handleSubmit();
    //  }
    


    optionClick = ()=> {
        if(this.state.optionbool){
            this.setState((prevState,props)=>{
                return {
                    optionbool: false,
                    displayoption: 'none',
                };
                console.log(this.state.optionbool);
            });
           
        }
        else {

        }
    }
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

      handleSubmit (event) {
        this.updateLikes()
        event.preventDefault();
        // var token= document.getElementById('_tokens').value;
        // console.log(token);
        const user = {
          name: this.state.name,
          method: 'POST',
          type:'varun',
          data:{
              likes:1
          },
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
        };
    
        // axios.post(`/factapi`, { user })
        //   .then(res => {
        //     console.log(res);
        //     console.log(res.data);
        //   })
        // axios.get(`factsapilike/store`)
        //     .then(res => {
        //     const persons = res.data;
        //     this.setState({ persons });
        //     console.log(persons);
        // })
    
        axios.post('http://127.0.0.1:8000/api/POST_like', user, {
                    headers: { 
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                }).then(
                    response => console.log(response.data)
                ).catch(
                    error => console.log(error)
                )
      }
      
  render () {
        const { facts } = this.state
        const { publicpoll } = this.state;
        const Question = ({name}) => (
            publicpoll.map((item, index) => 
            <form key={index} >
                  <div>
                    
                        <div className="pp__wrp text-center">
                            <h5 className="mb-5">{item.question}</h5>
                            
                            <ul className="options" style={{display:this.state.displayoption}} >
                            
                                {item.options.map((company, i) =>
                                
                                // <label className="btn btn-primary btn-block">{company.question}
                                    
                                    <input key={i} className="btn btn-primary btn-block" data-id={company.id} data-questionid={company.question_id} type="button" value={company.question} onClick={this.optionClick}/>     
                                    // </label>                                   
                                    )}
                                    
                            </ul>
                        </div>
                </div>
            </form>
        )
        );
        const Answer = () => (
         publicpoll.map((item, index) =>
            <div key={index}>              
            <div className="pp__wrp text-center">
                <h5 className="mb-5">{item.question}</h5>
                <PollResult />
            </div>
            </div>
            ));


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
                                        <span className="likecount" style={{background:this.state.background}} onClick={this.handleSubmit} ref="btn" >
                                        <i style={{color:this.state.bgColor}} className="la la-thumbs-o-up"></i> <span> {this.state.likes}</span></span>
                                        {/* <i className="la la-thumbs-o-up"></i> <span> {rowdata.home[0].like}</span></span> */}
                                    {/* </form> */}
                                </div>
                                <div className="factsod__facts-share">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F139.59.67.104%3A8002%2F&amp;src=sdkpreparse" className="no-decoration"><i className="la la-facebook"></i></a>
                                    <a target="_blank" href="https://twitter.com/home?status=http%3A//139.59.67.104%3A8002" className="no-decoration"><i className="la la-twitter"></i></a>
                                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//139.59.67.104%3A8002&title=Facts%20Nepal&summary=&source="><i className="la la-linkedin"></i></a>
                                    {/* <a href="http://139.59.67.104:8002/" className="no-decoration"><i className="la la-instagram"></i></a> */}
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
                    <div className="pp">
                        <div className="pp-header">
                        Public Poll
                        </div>
                       
                        { this.state.optionbool ? <Question /> : <Answer /> }
                        
                    </div>
                    
                     {/* <div className="pp">
                    <PollResult />
                    </div> */}
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