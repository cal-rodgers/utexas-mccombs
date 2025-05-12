// External Dependencies
import React, { Component } from 'react';

class LinkBoxItems extends Component {
  static slug = 'utmc_linkbox_item';

  _render_link() {
    const props = this.props;
    const button_text = props.link_text || '';
    const button_url = props.link_url || '';

    if (!button_text || !button_url) {
      return null;
    }

    return (
      <li className="utm-linkbox__flex__item">
        <a href={button_url} className="utm-linkbox__flex__link">
          {button_text}
          <i className="fas fa-caret-right link-box__flex__link__icon" aria-hidden="true"></i>
        </a>
      </li>
    );
  }

  render() {
    return this._render_link();
  }
}

export default LinkBoxItems;
