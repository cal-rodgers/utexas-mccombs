// External Dependencies
import React, { Component } from 'react';

class JumpMenuItems extends Component {
  static slug = 'jump_menu_item';

  _render_link() {
    const { link_text, link_url } = this.props;
    if (!link_text || !link_url) {
      return '';
    }
    return (
      <a 
        href={link_url} 
        className="utm-jumpmenu__link"
        role="listitem"
      >
        <span>{link_text}</span>
      </a>
    );
  }

  render() {
    return (
      <div 
        className="utm-jumpmenu__buttons"
        role="presentation"
      >
        {this._render_link()}
      </div>
    );
  }
}

export default JumpMenuItems;
