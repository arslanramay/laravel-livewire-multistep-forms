# StreamPlus Multi-Step User Onboarding Form Application

A Laravel Livewire-based multi-step form application for collecting user subscription details. This application supports both **Free** and **Premium** subscription types, guiding users through multiple steps to collect Personal Details, Address Details, and Payment Details (for Premium users).

## Project Overview

This project is designed to demonstrate a clean implementation of a multi-step user registration form with dynamic navigation and validation on each step. The following steps are included:

1. **Personal Details**
   - Name, Email, Phone, and Subscription Type selection.
2. **Address Details**
   - Address Line 1, Address Line 2, City, State, Postal Code, Country.
3. **Payment Details** (for Premium users only)
   - Card Number, Expiry Date, CVV.
4. **Confirmation**
   - Displays all the user-submitted details for review before final submission.

## Key Features

- Dynamic step navigation.
- Step-specific validation.
- Secure handling of sensitive user data (e.g., masking payment details).
- Organized code structure using Livewire components.
- Proper relationships between database models.
- Validation rules for Email address and credit card details.
- Encrypted credit crad details stored in the database.

## Main Files

### Livewire Components

1. **Subscriberform**: Handles the multi-step form logic and data submission.
   - File Path: `app/Livewire/Subscriberform.php`

### Blade Views

1. **Multi-step Form View**: Renders the multi-step form UI.
   - File Path: `resources/views/livewire/subscriberform.blade.php`

2. **Subscribers List View**: Displays a list of submitted subscribers.
   - File Path: `resources/views/subscribers-list.blade.php`

### Models

1. **Subscriber**: Represents a user in the subscription system.
   - File Path: `app/Models/Subscriber.php`
2. **Address**: Stores user address details.
   - File Path: `app/Models/Address.php`
3. **Payment**: Stores user payment details for Premium subscriptions.
   - File Path: `app/Models/Payment.php`

## Project Setup Instructions

To set up this Laravel project locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/arslanramay/streamplus-multistep-forms.git
   cd streamplus-multistep-forms
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Set Up Environment Variables**:
   - Copy `.env.example` to `.env`.
   ```bash
   cp .env.example .env
   ```
   - Configure database credentials and other necessary settings in the `.env` file.

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Start the Development Server**:
   ```bash
   php artisan serve
   ```

7. **Access the Application**:
   - Open your browser and navigate to `http://127.0.0.1:8000`.

8. **Testing the Application**:
   - Complete the multi-step form for Free and Premium subscriptions.
   - After submission, verify the data on the **Subscribers List** page by navigating to `/subscribers-list`.

## Usage

- Start by selecting a subscription type (Free or Premium) in Step 1.
- Fill in the required details for each step.
- For Premium subscriptions, enter payment details in Step 3.
- Review all information on the Confirmation page (Step 4) before submitting.
- Successfully submitted data will be stored in the database and displayed on the **Subscribers List** page.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request for any enhancements or bug fixes.

## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT). Developed by [Arslan Ramay](https://github.com/arslanramay)

---
For any issues or questions, feel free to reach out or create an issue on the GitHub repository.

