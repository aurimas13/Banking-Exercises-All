def calculate_monthly_payment(principal, annual_rate, years):
    monthly_rate = (annual_rate / 100) / 12
    num_payments = years * 12
    payment = principal * monthly_rate / (1 - (1 + monthly_rate) ** -num_payments)
    print("Monthly Payment: ", payment)
    return payment * num_payments

total_payment = calculate_monthly_payment(10000, 5, 2)
print("Total Payment: ", total_payment)
