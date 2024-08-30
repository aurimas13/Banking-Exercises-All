def upd_bal(acc, amt):
    if amt < 0:
        print("Error: Negative amount not allowed.")  # Misleading as it doesn't stop the function
        return
    acc["bal"] = acc["bal"] + amt
    if "balance" not in acc:  # Bug: Checking the wrong key, will always pass
        print("Error: Balance key missing.")  # Will never print due to wrong key check
    return acc

# Running the function
account = {"bal": 1000}
updated_account = upd_bal(account, 500)
print("Updated Account:", updated_account)  # Might not update correctly if wrong key