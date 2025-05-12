// External Dependencies
import React, { Component } from 'react';

class JumpMenuItems extends Component {

  static slug = 'utmc_split_hero_item';

  _render_link() {
    const props           = this.props;
    const button_text     = props.link_text ? props.link_text : '';
    const button_url     = props.link_url ? props.link_url : '';
    if(!button_text||!button_url){
        return '';
    }
    return (
        <a href={button_url} className="utm-btn--link utm-btn--link-arrow"> {button_text} <span
            className="utm-btn--arrow"></span></a>
    );
  }

  /**
   * Module render in VB
   */
  render() {

      return (
                    <div className="utm-split_hero__links">
                        {this._render_link()} 
                     </div>   
            );
      }
}

export default JumpMenuItems;
