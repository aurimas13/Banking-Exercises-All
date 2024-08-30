def calculate_monthly_payment(principal, annual_rate, years):
    if annual_rate == 0:
        print("Warning: Annual rate is zero, division by zero is imminent!")
        return 0
    monthly_rate = (annual_rate / 100) / 12
    num_payments = years * 12
    payment = 0
    for _ in range(num_payments):
        payment += principal * monthly_rate
        principal += principal * monthly_rate  # Incorrectly compounds the principal monthly
    print("Total Payment: ", payment)
    return payment

# Test with 0% interest rate and normal interest rate
try:
    monthly_payment = calculate_monthly_payment(10000, 0, 2)  # Edge case with 0% interest
except ZeroDivisionError:
    print("Error: Division by zero occurred!")

monthly_payment = calculate_monthly_payment(10000, 5, 2)
print("Monthly Payment: ", monthly_payment)
