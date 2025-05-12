// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './card.css';

class Card extends Component {
    static slug = 'utmc_card';

    render() {
        const { 
            variant,
            heading,
            cardimage,
            alt,
            textarea,
            button_url,
            button_text
        } = this.props;

        return (
            <Fragment>
                <div className={`utm-card utm-card__outer utm-card--${variant}`}>
                    <div className="utm-card__wrapper">
                        {/* Mobile headline shown for all variants now */}
                        <div className="utm-card__headline__mobile">
                            {heading}
                        </div>

                        {/* Card image */}
                        {cardimage && (
                            <div className="utm-card__image">
                                <img src={cardimage} alt={alt} />
                            </div>
                        )}

                        {/* Card content */}
                        <div className="utm-card__content">
                            <div className="utm-card__headline">
                                {heading}
                            </div>
                            <div className="utm-card__body">
                                {textarea}
                            </div>

                            {/* Card link */}
                            {button_url && button_text && (
                                <div className="utm-card__link">
                                    <a 
                                        className={`utm-btn utm-card--${variant} utm-btn--link utm-btn--link-arrow`}
                                        href={button_url}
                                    >
                                        {button_text}
                                        <span className="utm-btn--arrow" />
                                    </a>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </Fragment>
        );
    }
}

export default Card;
