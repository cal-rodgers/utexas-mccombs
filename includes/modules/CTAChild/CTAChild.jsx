// External Dependencies
import React, { Component } from 'react';

class CTAChild extends Component {

  static slug = 'utmc_cta_child';
  _render_button() {
    return (

               <div className="utm-cta__link">

                   {this.props.button_style === 'link' ?
                       <a className={`utm-btn--link utm-btn--link-${this.props.button_style}`}
                          href={this.props.button_url}>{this.props.button_text}<span className="utm-btn--arrow"></span></a>
                       : this.props.button_style === 'arrow' ?
                           <a className={`utm-btn--link utm-btn--link-${this.props.button_style}`}
                              href={this.props.button_url}>{this.props.button_text}<span className="utm-btn--arrow"></span></a>
                               : <a className={`utm-btn--button`} href={this.props.button_url}>{this.props.button_text}<span className="utm-btn--arrow"></span></a>
                   }

               </div>

    );
  }

    /**
     * Module render in VB
     */
    render() {
        return (
            this.props.button_url ? this._render_button()  : null
            );
    }

}

export default CTAChild;
