# Body Fat Percentage Calculator

This is a PHP script that calculates the body fat percentage (BFP), fat mass (FM), and lean mass (LM) based on user input. It also determines the category of the individual based on their BFP.

## Technologies Used

- PHP
- Bootstrap

## Getting Started

To get started, clone this repository to your local machine and navigate to the project directory in your terminal. Then, run the following command to create the Docker container:

```
docker-compose up
```

The calculator will be served at [http://localhost:7007](http://localhost:7007).

## Usage

To use this script, you need to set up a form that collects the following information:

- First Name
- Last Name
- Age
- Gender (either 'male' or 'female')
- Weight (in kilograms)
- Height (in centimeters)
- Waist circumference (in centimeters)
- Neck circumference (in centimeters)
- Hip circumference (only for females, in centimeters)

## Calculation Method

The script uses the US Navy Method to calculate the body fat percentage (BFP) based on the provided input.

## Displaying the Results

The script displays the results on a webpage using HTML and CSS. The category is displayed with a specific color based on the category:

- Essential Fat: green
- Athletic: blue
- Fit: orange
- Acceptable: yellow
- Obese: red

The script generates the following output:

```
Results
Dear [First Name] [Last Name],
You are [Age] years old and [Gender].
Your body fat percentage is [BFP]%.
Your fat mass: [FM] kg.
Your lean mass: [LM] kg.
Your category is: [Category].
```
## Screenshot

![desktop screenshot](https://github.com/Kapshtak/weight-calculator/blob/main/screenshots/desktop.png)

## Author

- LinkedIn - [Arseniiy Kapshtyk](https://www.linkedin.com/in/kapshtyk/)
- Github - [@kapshtak](https://github.com/Kapshtak)
