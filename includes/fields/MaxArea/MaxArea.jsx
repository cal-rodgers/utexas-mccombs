// External Dependencies
import React, { Component } from 'react';
//import { utmcSettings } from './utmc-options'
// Internal Dependencies
import './style.css';

class MaxArea extends Component {
  utmcSettings = JSON.parse(window.utmc_option);
  name = this.props.name;
  value = this.props.value;
  color = this.utmcSettings.color;
  enforce = this.utmcSettings[this.name]['enforce'];
  maxChar = this.utmcSettings[this.name]['max'];
  maxCharWarn = this.utmcSettings.warn;
  limit = this.maxChar;
  evnt = 'default';
  textColor = '';
  static slug = 'maxArea';

  /**
   * Handle input value change.
   *
   * @param {object} event
   */
  _onChange = (event) => {
     this.props._onChange(this.props.name, event.target.value);
     const val = event.target.value;
     if(this.enforce==='absolute'){
      this.count = this.maxChar-val.length;
    }else if(this.enforce==='unlimited'){
      this.count = val.length;
    }else{
       this.count = this.maxChar-val.length;
    }
     if (this.count <= this.maxCharWarn && this.enforce !== 'unlimited') {
         this.textColor = this.color;
        this.cname='redalert';
     }else{
         this.textColor = '';
          this.cname='greenalert';
     }
     this.evnt = '';
  }

  render() {
      if(this.evnt !== ''){
        switch (this.enforce) {
            case 'absolute':
                this.count = this.maxChar-this.value.length;
                break;
            case 'unlimited':
                this.limit = '';
                this.count = this.maxChar-this.value.length;
                break;
            default:
                this.limit = '';
                this.count = this.maxChar-this.value.length;
                break;
        }
         if (this.count <= this.maxCharWarn && this.enforce !== 'unlimited') {
             this.textColor = this.color;
            this.cname='redalert';
         }else{
             this.textColor = '';
              this.cname='greenalert';
         }
    }
    return(
    <div className='utmc-field'>
      <textarea 
        id={`utmc-input-${this.props.name}`}
        name={this.props.name}
        maxlength={this.limit}
        type='text'
        className='et-fb-settings-option-textarea et-fb-settings-option-text-area--block utmc-area'
        onChange={this._onChange}
      >{this.props.value}</textarea>
      <p className={`ch-count ${this.cname}`}  style={{ color: this.textColor }}>{this.count}</p>
      </div>
    );
  }
}

export default MaxArea;
