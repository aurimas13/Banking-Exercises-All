def generate_report(transactions):
    report_lines = [
        f"Transaction ID: {t['id']}\nAmount: {t['amount']}\nType: {t['type']}\n"
        for t in transactions
    ]
    print("Report generated successfully.")
    return "\n".join(report_lines)

# Example corrected report generation
transactions = [
    {'id': 1, 'amount': 100, 'type': 'credit'},
    {'id': 2, 'amount': 200, 'type': 'debit'}
]

generate_report(transactions)
