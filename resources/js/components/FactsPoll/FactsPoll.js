import axios from 'axios'
import React, { Component } from 'react'
import AllFacts from '../AllFacts/AllFacts';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import TimeAgo from 'timeago-react'; // var TimeAgo = require('timeago-react');
import PollResult from '../PollResult/PollResult';
import {FacebookShareCount } from 'react-share';
import Fade from 'react-reveal/Fade';
import Bounce from 'react-reveal/Bounce';


class FactsPoll extends Component {
    constructor(){
        super();
        this.state= {
                data:[
                  {
                    name: 'Liverpool', uv: 27
                  },
                  {
                    name: 'Arsenal', uv: 20
                  },
                  {
                    name: 'Chelsea', uv: 30 
                  },
                  {
                    name: 'Man Utd', uv: 40
                  }
                ],
            facts: [],
            publicpoll:[],
            pollresultapi:[],
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
        axios.get(`api/factapi`).then(response => {
          this.setState({
            facts: response.data
            
          })
        })

        axios.get(`api/publicpoll`).then(response => {
            this.setState({
                publicpoll: response.data
            })
          })

        axios.get(`api/pollresultapi`).then(response => {
            this.setState({
                pollresultapi: response.data
                
            })
            
          })
        
        // console.log(pollresultapi);
      }
   


    pollOptionClick = (event)=> {
        // console.log(event.currentTarget.getAttribute('data-id'));
        const optionindex = event.currentTarget.getAttribute('data-id');
        const optionid= event.currentTarget.getAttribute('data-optionid');
        const questionid= event.currentTarget.getAttribute('data-questionid');
        console.log(optionindex);
        console.log(optionid);
        if(this.state.optionbool){
            let dataCopy = JSON.parse(JSON.stringify(this.state.data))
            //make changes to ingredients
            // console.log(dataCopy);
            dataCopy[optionindex].uv = this.state.data[optionindex].uv += 1
            // console.log(dataCopy[3].uv);
            // dataCopy[0] = this.state.data
            // this.setState({
                 
            //     })  
            this.setState((prevState,props)=>{
                return {
                    optionbool: false,
                    data:dataCopy,
                    displayoption: 'none',
                };
                console.log(this.state.optionbool);
            });




            const pollresult = {
                method: 'POST',
                name:event.currentTarget.id,
                type:'json',
                data:{
                    'poll_id':questionid,
                    'option_id':optionid
                },
                headers: {
                  'Accept': 'application/json',
                  'Content-Type': 'application/json'
                },
              };
          
              axios.post('http://127.0.0.1:8000/api/publicpollresult', pollresult, {
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
        else {

        }
    }
    // updateLikes = () => {

    //     if(!this.state.updated) {
    //         let recipesCopy = JSON.parse(JSON.stringify(this.state.facts))
    //         //make changes to ingredients
    //         console.log(recipesCopy[0].home[0]);
    //         recipesCopy[0].home[0].like = this.state.facts[0].home[0].like += 1
    //         this.setState({
    //             facts:recipesCopy 
    //             })  
    //         // this.setState(prevState => {
    //         //     const facts = [...prevState.facts];
    //         //     facts[i] = { ...facts[i], [like]: 9 };
    //         //     return { team };
    //         //   });
            
    //     //   this.setState((prevState, props) => {
    //     //     return {
    //     //         facts: prevState.facts
    //     //     };
    //     //   });
    //       this.setState({
    //         bgColor: '#a93c46',
    //         updated: true,
    //         // padding: 1px 9px;
    //         background: '#fde2e4'
    //         // background: '#ddecfb'
    //       })
    //     } else {
    
    //     //   this.setState((prevState, props) => {
    //     //     return {
    //     //       likes: prevState.likes - 1,
    //     //       updated: false,
    //     //       bgColor: "black",
    //     //       background: ""
    //     //     };
    //     //   });

    //     }
    
    
    // }

    ToggleClick = () => {
        this.setState({ show: !this.state.show });
    }

      handleSubmit (event) {
        const postindex= event.currentTarget.dataset.id
        
        if(!this.state.updated) {
            let recipesCopy = JSON.parse(JSON.stringify(this.state.facts))
            //make changes to ingredients
            console.log(recipesCopy[0].home[0]);
            recipesCopy[0].home[0].like = this.state.facts[0].home[0].like += 1
            this.setState({
                facts:recipesCopy 
                })  
            // this.setState(prevState => {
            //     const facts = [...prevState.facts];
            //     facts[i] = { ...facts[i], [like]: 9 };
            //     return { team };
            //   });
            
        //   this.setState((prevState, props) => {
        //     return {
        //         facts: prevState.facts
        //     };
        //   });
          this.setState({
            bgColor: '#a93c46',
            updated: true,
            // padding: 1px 9px;
            background: '#fde2e4'
            // background: '#ddecfb'
          })


        //   console.log(event.currentTarget.id);
          event.preventDefault();
          const user = {
            method: 'POST',
            name:event.currentTarget.id,
            type:'json',
            data:{
                'post_id':event.currentTarget.id,
                'post_like':1
            },
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json'
            },
          };
      
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
                                    
                                    <input key={i} className="btn btn-primary btn-block" data-optionid={company.id} data-id={i} /* data-id={company.id} */ data-questionid={company.question_id} type="button" value={company.question} onClick={event => this.pollOptionClick(event)}/>     
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
            <Fade bottom duration={1000} delay={500} distance={"40px"} >
                <h5 className="mb-5">{item.question}</h5>
                <PollResult data={this.state.pollresultapi}/>
            </Fade>
            </div>
            </div>
            ));


        const description = facts.map((rowdata,i)=>
        
            <form key={i}>
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
                                        <span id={rowdata.home[0].id} className="likecount" style={{background:this.state.background}} onClick={event => this.handleSubmit(event)} ref="btn" >
                                        <i style={{color:this.state.bgColor}} className="la la-thumbs-o-up"></i> <span> {rowdata.home[0].like}</span></span>
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
            </form>  
        )
    return (
        <section className="section-padding-y fact-poll">
            <div className="container">
                <div className="row">
                    <div className="col-md-8 relative">
                        <Fade bottom duration={1400} delay={1000} distance={"50px"}>
                            <div className="factsod">
                                <div className="factsod__header">
                                {/* <Link className="viewall no-decoration" to="/allfacts"><span>View All</span><i className=" la la-caret-right"></i></Link> */}
                                Facts Of The Day
                                
                                </div>
                                {description}
                            </div>
                        </Fade>   
                    </div>
                    <div className="col-md-4">
                    <Fade bottom duration={1400} delay={1000} distance={"50px"} >
                    <div className="pp">
                        <div className="pp-header">
                        Public Poll
                        </div>
                       
                        { this.state.optionbool ? <Question /> : <Answer /> }
                        
                    </div>
                    
                     {/* <div className="pp">
                    <PollResult />
                    </div> */}
                    </Fade>
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