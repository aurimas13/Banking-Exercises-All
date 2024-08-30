def process_transactions(transactions):
    processed_transactions = []
    for transaction in transactions:
        status = "approved" if transaction["amount"] > 10000 else "pending"
        processed_transactions.append({"transaction_id": transaction["id"], "status": status})
    
    if len(processed_transactions) != len(transactions):
        raise ValueError("Transaction processing incomplete.")
    
    return processed_transactions

# Example usage
transactions = [{"id": 1, "amount": 15000}, {"id": 2, "amount": 5000}, {"id": 3, "amount": 12000}]
result = process_transactions(transactions)
print("Processed Transactions:", result)