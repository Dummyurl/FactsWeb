import React from 'react';
import Slider from 'react-animated-slider';
import 'react-animated-slider/build/horizontal.css';
import content from '../Json/content';
import 'react-animated-slider/build/horizontal.css';
import 'normalize.css';
import '../../css/slider.css';
import '../../css/styles.css';
class Slides extends React.Component {
    constructor(props){
        super(props);
        
           
        
    }
    render() {
        return(
        <Slider className="slider-wrapper"  autoplay={2000}>
			{content.map((item, index) => (
				<div
					key={index}
					className="slider-content"
					style={{ background: `url('${item.image}') no-repeat center center` }}>
					<div className="inner">
						<h1>{item.title}</h1>
						<p>{item.description}</p>
						<button>{item.button}</button>
					</div>
					<section>
						<img src={item.userProfile} alt={item.user} />
						<span>
							Posted by <strong>{item.user}</strong>
						</span>
					</section>
				</div>
			))}
		</Slider>)
    }
}
export default Slides;