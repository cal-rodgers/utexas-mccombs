# UT McCombs Custom Divi Modules

A WordPress plugin that provides custom Divi Builder modules for the UT McCombs website. Built using Create Divi Extension.

## Features

This plugin includes the following custom Divi modules:

- Alert
- Card
- CourseTable
- CourseTableAll
- CTA
- FacultyLinks
- Hero
- HomeHero
- JumpMenu
- LinkBox
- Quote
- SectionHeading
- SectionHeadingBox
- SplitHero
- Statistic

## Requirements

- WordPress 5.0+
- Divi Theme or Divi Builder Plugin
- PHP 7.4+

## Installation

1. Download the plugin zip file
2. Upload to your WordPress site through the Plugins menu
3. Activate the plugin
4. The custom modules will be available in the Divi Builder

## Development Requirements

- Node.js 14 (required for Apple Silicon M-series chip compatibility)
- Yarn package manager

## Build Process

1. Switch to Node.js 14 if using nvm:
   ```bash
   nvm use 14
   ```

2. Install dependencies:
   ```bash
   yarn install
   ```

3. Build the plugin:
   ```bash
   yarn build
   ```

The build process will generate:
- `scripts/builder-bundle.min.js`
- `scripts/frontend-bundle.min.js`
- `styles/style.min.css`
- `styles/backend-style.min.css`

**Note:** Node.js 14 is specifically required for compatibility with the grunt-po2mo module and Sass compilation on Apple Silicon machines.

