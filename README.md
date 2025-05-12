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
- Local WordPress development environment
- Divi theme installed and activated

## Development Workflow

1. Switch to Node.js 14:
   ```bash
   nvm use 14
   ```

2. Install dependencies:
   ```bash
   yarn install
   ```

3. Start the development server:
   ```bash
   yarn start
   ```
   This will:
   - Start a development server on port 3000
   - Watch for changes in your module files
   - Enable hot reloading

4. Keep the development server running while:
   - Editing modules in the Visual Builder
   - Making changes to module files
   - Testing module functionality

## Build Process

1. For development, start the server:
   ```bash
   yarn start
   ```

2. For production builds:
   ```bash
   yarn build
   ```
   This generates:
   - `scripts/builder-bundle.min.js`
   - `scripts/frontend-bundle.min.js`
   - `styles/style.min.css`
   - `styles/backend-style.min.css`

3. For deployment, create a zip package:
   ```bash
   yarn zip
   ```

## Troubleshooting

- If you see node-sass errors, ensure you're using Node.js 14:
  ```bash
  nvm use 14
  ```

- If modules aren't loading in the Visual Builder:
  1. Ensure the development server is running (`yarn start`)
  2. Clear your browser cache
  3. Refresh the WordPress admin page

**Note:** Node.js 14 is specifically required for compatibility with divi-scripts, node-sass, and proper functioning on Apple Silicon machines.

