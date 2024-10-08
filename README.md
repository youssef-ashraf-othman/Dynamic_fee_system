# Dynamic Fee System

## Overview
This project implements a dynamic fee system with various services, fee presets, and thresholds. It allows users to calculate fees based on predefined criteria.

## Table of Contents
- [Database Schema](#database-schema)
- [Fee Calculation Logic](#fee-calculation-logic)
- [Running the Project Locally](#running-the-project-locally)

## Database Schema
The database consists of the following tables:

### 1. Services
- **id**: Primary key, auto-incrementing.
- **name**: String, name of the service.

### 2. Fee Presets
- **id**: Primary key, auto-incrementing.
- **name**: String, name of the fee preset.

### 3. Thresholds
- **id**: Primary key, auto-incrementing.
- **amount**: Decimal, threshold amount.

### 4. Fee Percentages
- **id**: Primary key, auto-incrementing.
- **fee_preset_id**: Foreign key, references the `fee_presets` table.
- **service_id**: Foreign key, references the `services` table.
- **threshold_id**: Foreign key, references the `thresholds` table.
- **percentage**: Decimal, percentage fee for the service.


## Fee Calculation Logic
The fee calculation is determined by the following rules:
1. Select the service and the fee preset.
2. Based on the selected service, retrieve the corresponding fee percentage associated with the chosen preset and threshold.
3. Calculate the fee by applying the percentage to the base amount.


## Running project locally:

###Prerequisites:

1-PHP (>= 7.3)

2-Composer

3-XAMPP or any other local server

4-MySQL database

###Steps to Run the Project:

1-Clone the repository

2-Install dependencies

3-Set up the environment file

4-Configure your database

5-Update the .env file with your database credentials.

6-Start the local server:


finally to access the application:

Open your browser and go to http://localhost:8000.

