def assess_loan_risk(application):
    risk_score = 0

    # Bug 1: Incorrect use of comparison operators (== instead of >=)
    if application['credit_score'] == 700:
        risk_score -= 10
    elif application['credit_score'] < 600:
        risk_score += 20

    # Bug 2: Using hardcoded values, which should be constants or configurable
    if application['income'] < 30000:
        risk_score += 30
    elif application['income'] > 100000:
        risk_score -= 10

    # Bug 3: Potential division by zero if income is zero
    dti_ratio = application['debt'] / application['income']
    if dti_ratio > 0.5:
        risk_score += 40
        print("Error: High debt-to-income ratio detected.")

    # Bug 4: Incorrectly handling None or missing fields in application dictionary
    if 'credit_score' not in application or application['credit_score'] is None:
        risk_score += 50

    # Bug 5: String comparison using 'is' instead of '=='
    if application['loan_type'] is 'mortgage': 
        risk_score += 15

    # Bug 6: Missing quotes around 'High' leading to a NameError
    if risk_score > 50:
        risk_level = High 
    elif risk_score > 20:
        risk_level = 'Medium'
    else:
        risk_level = 'Low'

    # Bug 7: Incorrect return type, risk_level might not be defined if errors occur
    print(f"Loan risk level assessed as: {risk_level}")
    return risk_level

# Example flawed loan risk assessment
application = {'credit_score': 650, 'income': 50000, 'debt': 30000, 'loan_type': 'mortgage'}
assess_loan_risk(application)

# def assess_loan_risk(application):
#     risk_score = 0

#     if application['credit_score'] > 700:
#         risk_score -= 10
#     elif application['credit_score'] < 600:
#         risk_score += 20

#     if application['income'] < 30000:
#         risk_score += 30
#     elif application['income'] > 100000:
#         risk_score -= 10

#     dti_ratio = application['debt'] / application['income']  # Possible division by zero
#     if dti_ratio > 0.5:
#         risk_score += 40
#         print("Error: High debt-to-income ratio detected.")

#     # Intentional bugs:
#     if risk_score > 50:
#         risk_level = High # Bug: Missing quotation marks around 'High'
#     elif risk_score > 20:
#         risk_level = 'Medium'
#     else:
#         risk_level = 'Low'

#     print(f"Loan risk level assessed as: {risk_level}")
#     return risk_level

# # Example flawed loan risk assessment
# application = {'credit_score': 650, 'income': 50000, 'debt': 30000}
# assess_loan_risk(application)

# # def assess_loan_risk(application):
# #     risk_score = 0

# #     if application['credit_score'] > 700:
# #         risk_score -= 10  # Bug: Lower risk score for higher credit score
# #     elif application['credit_score'] < 600:
# #         risk_score += 20  # Incorrect logic: Adding risk for low scores

# #     if application['income'] < 30000:
# #         risk_score += 30  # Error-prone income threshold
# #     elif application['income'] > 100000:
# #         risk_score -= 10  # Inconsistent logic with other checks

# #     dti_ratio = application['debt'] / application['income']  # Possible division by zero
# #     if dti_ratio > 0.5:
# #         risk_score += 40  # Bug: May flag normal cases as high risk
# #         print("Error: High debt-to-income ratio detected.")

# #     if risk_score > 50:
# #         risk_level = 'High'
# #     elif risk_score > 20:
# #         risk_level = 'Medium'
# #     else:
# #         risk_level = 'Low'

# #     print(f"Loan risk level assessed as: {risk_level}")  # Redundant output
# #     return risk_level

# # # Example flawed loan risk assessment
# # application = {'credit_score': 650, 'income': 50000, 'debt': 30000}
# # assess_loan_risk(application)