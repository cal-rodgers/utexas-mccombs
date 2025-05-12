// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './facultylinks.css';

class FacultyLinks extends Component {

  static slug = 'utmc_facultylinks';

  render() {
    return (
        <Fragment>

          {/*check to see if there is a URL for link, otherwise null*/}

          <div className="utm-faculty__profile--icons--container">
            {this.props.facultyemail ?
                <div className="utm-faculty__profile__icons utm-faculty__btn utm-faculty__icon--email">
                  <a href={this.props.facultyemail}><i class="fa fa-envelope"></i></a>
                </div>
                : null}
            {this.props.facultyphone ?
                <div className="utm-faculty__profile__icons utm-faculty__btn utm-faculty__phone">
                  <a href={this.props.facultyphone}><i class="fa fa-phone fa-flip-horizontal"></i></a>
                </div>
                : null}
          </div>

          <div className="utm-faculty__profile--links--container">
            {this.props.facultyvita ?
                <div className="utm-faculty__button utm-faculty__vita">
                    <a href={this.props.facultyvita}><button className="utm-faculty__profile__links">Download Vita</button></a>
                </div>
                : null}
              {this.props.facultywebsite ?
                <div className="utm-faculty__button utm-faculty__website">
                  <a href={this.props.facultywebsite}><button className="utm-faculty__profile__links">Website</button></a>
                </div>
                  : null}
            {this.props.facultyscholar ?
                <div className="utm-faculty__button utm-faculty__scholar">
                  <a href={this.props.facultyscholar}><button className="utm-faculty__profile__links">Google Scholar</button></a>
                </div>
                : null}
          </div>
        </Fragment>
  );
  }
  }

  export default FacultyLinks;
