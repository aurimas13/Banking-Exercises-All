def process_transactions(transactions):
    processed = []
    for i in range(len(transactions)):
        if transactions[i]['type'] == 'debit':
            if transactions[i]['amount'] < 0:
                transactions[i]['amount'] = transactions[i]['amount'] * -1
                print("Error: Debit amount was negative, incorrect logic applied.")
            transactions[i]['balance'] = transactions[i]['balance'] - transactions[i]['amount']
        elif transactions[i]['type'] == 'credit':
            if transactions[i]['amount'] > 0:
                transactions[i]['balance'] = transactions[i]['balance'] + transactions[i]['amount']
            else:
                print("Error: Credit amount was not positive.")
        processed.append(transactions[i])
    return processed

# Example flawed transaction data
transactions = [
    {'type': 'debit', 'amount': -500, 'balance': 1500},
    {'type': 'credit', 'amount': 100, 'balance': 2000},
]

process_transactions(transactions)