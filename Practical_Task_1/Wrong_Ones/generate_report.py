def generate_report(transactions):
    report = ''
    for transaction in transactions:
        report += 'Transaction ID: ' + str(transaction['id']) + '\n'
        report += 'Amount: ' + str(transaction['amount']) + '\n'
        report += 'Type: ' + transaction['type'] + '\n\n'
    print("Error: Report generation is inefficient and poorly formatted.")
    return report

# Example flawed report generation
transactions = [
    {'id': 1, 'amount': 100, 'type': 'credit'},
    {'id': 2, 'amount': 200, 'type': 'debit'}
]

generate_report(transactions)

