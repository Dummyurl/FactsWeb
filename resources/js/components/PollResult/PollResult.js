/* App.js */
import React, { Component } from 'react'
// var Component = React.Component;
import CanvasJSReact from '../../../../public/js/canvasjs.react'

var CanvasJS = CanvasJSReact.CanvasJS;
var CanvasJSChart = CanvasJSReact.CanvasJSChart;
 
class PollResult extends Component {	
	render() {
		const options = {
			animationEnabled: true,
			theme: "dark2",
			title: {
				text: "Worpress Featured Plugins"
			},
			axisY: {
			title: "Active Installations",
				scaleBreaks: {
					autoCalculate: true,
			  type: "wavy",
			  lineColor: "white"
				}
			},
			data: [{
				type: "column",
				indexLabel: "{y}",		
				indexLabelFontColor: "white",
				dataPoints: [
					{"label":"Akismet Anti-Spam","y":5000000},
					{"label":"Jetpack","y":4000000},
					{"label":"WP Super Cache","y":2000000},
					{"label":"bbPress","y":300000},
					{"label":"BuddyPress","y":200000},
					{"label":"Health Check","y":200000}    
				]
			}]
		}
		
		return (
		<div>
			<CanvasJSChart options = {options} 
				/* onRef={ref => this.chart = ref} */
			/>
			{/*You can get reference to the chart instance as shown above using onRef. This allows you to access all chart properties and methods*/}
		</div>
		);
	}
}
 
export default PollResult;