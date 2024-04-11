from flask import Flask, render_template, request
import pandas as pd

app = Flask(__name__)

# Load the inventory data from the CSV file
def load_inventory_data():
    # Replace 'inventory.csv' with the path to your inventory dataset file
    inventory_data = pd.read_csv('inventory.csv')
    return inventory_data

@app.route('/')
def inventory():
    # Load the inventory data
    data = load_inventory_data()
    
    # Filter out items with quantity > 0
    available_inventory = data[data['QUANTITY'] > 0]
    
    # Convert the DataFrame to HTML table representation
    inventory_html = available_inventory.to_html(classes='table table-striped', index=False)
    
    # Render the inventory data in the HTML template
    return render_template('inventory.html', inventory_table=inventory_html)

if __name__ == '__main__':
    app.run(debug=True)
