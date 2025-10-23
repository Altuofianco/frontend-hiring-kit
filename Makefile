.PHONY: help update start stop data-init data-refresh

# Paths
API_MOCK_DIR = api-mock
DATA_DIR = $(API_MOCK_DIR)/public/data
SAMPLE_FILE = $(DATA_DIR)/sample.customer
CUSTOMER_FILE = $(DATA_DIR)/customer.txt

# Colors
GREEN = \033[0;32m
YELLOW = \033[0;33m
RED = \033[0;31m
NC = \033[0m # No Color

help: ## Show this help message
	@echo "$(GREEN)Available commands:$(NC)"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "  $(YELLOW)%-15s$(NC) %s\n", $$1, $$2}'

update: ## Update CodeIgniter dependencies via Composer
	@echo "$(GREEN)Updating CodeIgniter dependencies...$(NC)"
	cd $(API_MOCK_DIR) && composer update
	@echo "$(GREEN)Dependencies updated successfully!$(NC)"

start: ## Start CodeIgniter development server
	@echo "$(GREEN)Starting CodeIgniter server on http://localhost:8080$(NC)"
	@cd $(API_MOCK_DIR) && php spark serve

stop: ## Stop CodeIgniter development server (Ctrl+C)
	@echo "$(YELLOW)To stop the server, press Ctrl+C$(NC)"

data-init: ## Copy sample.customer to customer.txt
	@if [ ! -f $(SAMPLE_FILE) ]; then \
		echo "$(RED)Error: $(SAMPLE_FILE) not found!$(NC)"; \
		exit 1; \
	fi
	@if [ -f $(CUSTOMER_FILE) ]; then \
		echo "$(YELLOW)Warning: $(CUSTOMER_FILE) already exists. Use 'make data-refresh' to overwrite.$(NC)"; \
		exit 1; \
	fi
	@cp $(SAMPLE_FILE) $(CUSTOMER_FILE)
	@echo "$(GREEN)File customer.txt created successfully from sample.customer$(NC)"

data-refresh: ## Delete and recreate customer.txt from sample.customer
	@if [ ! -f $(SAMPLE_FILE) ]; then \
		echo "$(RED)Error: $(SAMPLE_FILE) not found!$(NC)"; \
		exit 1; \
	fi
	@if [ -f $(CUSTOMER_FILE) ]; then \
		rm $(CUSTOMER_FILE); \
		echo "$(YELLOW)File customer.txt deleted$(NC)"; \
	fi
	@cp $(SAMPLE_FILE) $(CUSTOMER_FILE)
	@echo "$(GREEN)File customer.txt recreated successfully from sample.customer$(NC)"