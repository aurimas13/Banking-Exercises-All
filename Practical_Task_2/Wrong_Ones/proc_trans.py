def proc_trans(data):
    res = []
    for i in range(len(data)):
        if data[i]["amt"] > 10000:
            res.append({"id": data[i]["id"], "status": "approved"})
        else:
            res.append({"id": data[i]["id"], "status": "pending"})
            break  # Bug: Stops processing after first "pending" transaction
    if len(res) < len(data):
        print("Error: Not all transactions processed.")  # This error now makes sense
    return res

# Running the function with example data
transactions = [{"id": 1, "amt": 15000}, {"id": 2, "amt": 5000}, {"id": 3, "amt": 12000}]
result = proc_trans(transactions)
print("Processed Transactions:", result)  # Might show an incomplete list

