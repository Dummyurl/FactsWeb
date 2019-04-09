import React from 'react';
import axios from 'axios';
import TimeAgo from 'timeago-react';

export default class AllFacts extends React.Component {
    constructor() {
        super();
        this.state = {
          facts: [],
            name: '',
            persons: []
          }
          this.handleChange= this.handleChange.bind(this)
          this.handleSubmit= this.handleSubmit.bind(this)
    }
  

  handleChange (event) {
    this.setState({ name: event.target.value });
  }

  componentDidMount () {
    axios.get(`api/factapi`).then(response => {
      this.setState({
        facts: response.data
        
      })
      console.log(this.facts)
    
    // console.log(likecount);
    })

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

handleSubmit (event) {
  const eventid= event.currentTarget.id;
  console.log(eventid);
  const postindex= event.currentTarget.dataset.id
  const postspan= event.currentTarget;
  
  console.log(postspan);
  // console.log(event.currentTarget.dataset.id);
  if(!this.state.updated) {
    postspan.classList.add('liked');
      let recipesCopy = JSON.parse(JSON.stringify(this.state.facts))
      //make changes to ingredients
      // console.log(recipesCopy[0].home[eventid]);
      console.log(eventid);
      recipesCopy[0].home[postindex].like = this.state.facts[0].home[postindex].like += 1
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
    // this.setState({
    //   bgColor: '#a93c46',
    //   updated: true,
    //   // padding: 1px 9px;
    //   background: '#fde2e4'
    //   // background: '#ddecfb'
    // })


    // console.log(event.currentTarget.id);
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


  render() {
    const { facts } = this.state
    // const description = ;
    return (
      <div>
      {  facts.map((rowdata,i)=>
        rowdata.home.map((subrowdata,i)=>

      <div className="col-md-8 relative allfacts">
          <div className="factsod">
              <div className="factsod__header">
              {/* <Link className="viewall no-decoration" to="/allfacts"><span>View All</span><i className=" la la-caret-right"></i></Link> */}
              Facts
              
              </div>
            
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
                        {/* <Link className="viewall no-decoration" to="/allfacts"><span>View All</span><i className=" la la-caret-right"></i></Link> */}
                        <div className="img-wpr">
                            {/* <img src={subRowData.image} alt="todaysfact" /> */}
                            <img src={subrowdata.image} alt="todaysfact" />
                        </div>
                        <div className="factsod__detail">
                            <h6>
                            {rowdata.description}
                            </h6>
                            <div className="cholder">
                                <div className="factsod__counts">
                                    <span className="badge education"> {subrowdata.category_title}</span>
                                    <span className="time">
                                    <i className="la la-calendar-o"></i>

                                    <span><TimeAgo
                                        datetime={subrowdata.updated_at} 
                                         /></span>
                                    </span>
                                    {/* <form id="likeform" method="POST"> */}
                                        <span data-id={i} id={subrowdata.id} className="likecount" style={{background:this.state.background}} onClick={event => this.handleSubmit(event)} ref="btn" >
                                        <i style={{color:this.state.bgColor}} className="la la-thumbs-o-up"></i> <span> {subrowdata.like}</span></span>
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
                     
                }
            </div>  
        
              {/* {description} */}
          </div>
      </div>
      ))
              }
              </div>
    )
  }
}